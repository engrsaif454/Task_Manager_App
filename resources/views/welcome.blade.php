<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Heading -->
                <div class="text-center mb-4">
                    <h1>Task Management</h1>
                    <p>Manage your tasks efficiently</p>
                </div>
                
                <!-- Task List -->
                <div class="mb-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add New Task</button>
                </div>
                <div class="list-group" id="taskList">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Task 1
                        <span class="badge bg-success">Completed</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Task 2
                        <span class="badge bg-warning">In Progress</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Task 3
                        <span class="badge bg-danger">Pending</span>
                    </div>
                </div>

                <!-- Add Task Modal -->
                <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addTaskForm">
                                    <div class="mb-3">
                                        <label for="taskTitle" class="form-label">Task Title</label>
                                        <input type="text" class="form-control" id="taskTitle" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="taskDescription" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="taskStatus" class="form-label">Status</label>
                                        <select class="form-select" id="taskStatus" required>
                                            <option value="pending">Pending</option>
                                            <option value="in-progress">In Progress</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="addTaskForm" id="saveTaskBtn">Save Task</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Add task functionality
        document.getElementById('saveTaskBtn').addEventListener('click', function(event) {
            event.preventDefault();
            let title = document.getElementById('taskTitle').value;
            let description = document.getElementById('taskDescription').value;
            let status = document.getElementById('taskStatus').value;

            let taskList = document.getElementById('taskList');
            let taskItem = document.createElement('div');
            taskItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
            taskItem.innerHTML = `${title} <span class="badge bg-${status === 'completed' ? 'success' : (status === 'in-progress' ? 'warning' : 'danger')}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>`;
            
            taskList.appendChild(taskItem);

            // Clear the form and close the modal
            document.getElementById('addTaskForm').reset();
            let addTaskModal = new bootstrap.Modal(document.getElementById('addTaskModal'));
            addTaskModal.hide();
        });
    </script>
</body>
</html>
