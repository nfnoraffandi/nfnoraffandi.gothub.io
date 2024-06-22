document.addEventListener('DOMContentLoaded', () => {
    const taskForm = document.getElementById('task-form');
    const taskList = document.getElementById('task-list');
    const filterStatus = document.getElementById('filter-status');
    const filterPriority = document.getElementById('filter-priority');
    const taskPrioritySelect = document.getElementById('task-priority');
    const priorityColorInput = document.getElementById('priority-color');
    const colorOptionsDiv = document.getElementById('color-options');

    let tasks = [];

    // Check if tasks are stored in localStorage on page load
    const storedTasks = localStorage.getItem('tasks');
    if (storedTasks) {
        tasks = JSON.parse(storedTasks);
        renderTasks();
    }

    taskForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const newTask = {
            id: Date.now(),
            title: taskForm['title'].value,
            description: taskForm['description'].value,
            dueDate: taskForm['due_date'].value,
            priority: taskForm['priority'].value,
            priorityColor: priorityColorInput.value, // Store selected color
            completed: false
        };
        tasks.push(newTask);
        saveTasksToLocalStorage();
        renderTasks();
        taskForm.reset();
    });

    // Show color options when priority is selected
    taskPrioritySelect.addEventListener('change', () => {
        if (taskPrioritySelect.value === 'high' || taskPrioritySelect.value === 'medium' || taskPrioritySelect.value === 'low') {
            colorOptionsDiv.style.display = 'block';
        } else {
            colorOptionsDiv.style.display = 'none';
        }
    });

    function renderTasks() {
        taskList.innerHTML = '';
        const filteredTasks = tasks.filter(task => {
            const statusFilter = filterStatus.value === 'all' || 
                                 (filterStatus.value === 'completed' && task.completed) ||
                                 (filterStatus.value === 'pending' && !task.completed);
            const priorityFilter = filterPriority.value === 'all' || 
                                   filterPriority.value === task.priority;
            return statusFilter && priorityFilter;
        });
        filteredTasks.sort((a, b) => {
            const priorityOrder = { 'high': 1, 'medium': 2, 'low': 3 };
            return priorityOrder[a.priority] - priorityOrder[b.priority];
        });
        filteredTasks.forEach(task => {
            const taskItem = document.createElement('li');
            let priorityEmoji = '';
            let borderColor = task.priorityColor || ''; // Use stored color if available
            if (!borderColor) {
                // Set default colors if not stored
                if (task.priority === 'high') {
                    borderColor = '#ff0000'; // Red
                } else if (task.priority === 'medium') {
                    borderColor = '#ff9900'; // Orange
                } else if (task.priority === 'low') {
                    borderColor = '#ffff00'; // Yellow
                }
            }
            if (task.priority === 'high') {
                priorityEmoji = '❗❗'; 
            } else if (task.priority === 'medium') {
                priorityEmoji = '❗'; 
            } else if (task.priority === 'low') {
                priorityEmoji = '❕'; 
            }
            taskItem.style.borderLeft = `5px solid ${borderColor}`;
            taskItem.innerHTML = `
                <div>
                    <h3>${task.title}</h3>
                    <p>${task.description}</p>
                    <p>Due: ${task.dueDate}</p>
                    <p>Priority: ${priorityEmoji} ${task.priority}</p>
                </div>
                <div>
                    <button onclick="editTask(${task.id})">Edit</button>
                    <button onclick="deleteTask(${task.id})">Delete</button>
                    <button onclick="toggleComplete(${task.id})">${task.completed ? 'Unmark' : 'Complete'}</button>
                </div>
            `;
            taskList.appendChild(taskItem);
        });
    }

    function saveTasksToLocalStorage() {
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    window.editTask = function(id) {
        const task = tasks.find(task => task.id === id);
        taskForm['title'].value = task.title;
        taskForm['description'].value = task.description;
        taskForm['due_date'].value = task.dueDate;
        taskForm['priority'].value = task.priority;
        priorityColorInput.value = task.priorityColor || ''; // Set stored color if available
        tasks = tasks.filter(task => task.id !== id);
        saveTasksToLocalStorage();
        renderTasks();
    }

    window.deleteTask = function(id) {
        tasks = tasks.filter(task => task.id !== id);
        saveTasksToLocalStorage();
        renderTasks();
    }

    window.toggleComplete = function(id) {
        const task = tasks.find(task => task.id === id);
        task.completed = !task.completed;
        saveTasksToLocalStorage();
        renderTasks();
    }

    filterStatus.addEventListener('change', renderTasks);
    filterPriority.addEventListener('change', renderTasks);
});
