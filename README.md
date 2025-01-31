# Task-cli
Task Tracker is a simple command-line interface (CLI) application built with PHP to help you manage your tasks. With this tool, you can easily add, update, delete, and track the status of your tasks. The application stores all tasks in a JSON file, making it easy to manage and retrieve your tasks at any time.

# Feature
 - **Add, Update, and Delete tasks:** Easily manage your tasks by adding new ones, updating existing ones, or deleting tasks you no longer need.
 - **Mark tasks as in progress or done:** Track the progress of your tasks by marking them as "in-progress" or "done".
 - **List tasks:** View all your tasks, or filter them by status (todo, in-progress, done).
 - **Persistent storage:** All tasks are stored in a JSON file, ensuring that your data is saved even after closing the application.

# Requirements
 - PHP (version 7.4 or higher recommended)

# Installation
1. Clone the repository or download the `task-cli.php` file.
2. make the script executable and run it directly from the command line, follow these steps:
Run the following command in your terminal:
``` bash
chmod +x task-cli.php
```

# Usage
``` bash
./task-cli.php add "Buy groceries"
# Output: Task added successfully (ID: <unique id>)
./task-cli.php update 1 "Buy groceries and cook dinner"
# Output: Task updated successfully (ID: <unique id>)
./task-cli.php delete 1
# Output: Task deleted successfully (ID: <unique id>)

./task-cli.php mark-in-progress 1
# Output: Task marked as in-progress (ID: <unique id>)
./task-cli.php mark-done 1
# Output: Task marked as done (ID: <unique id>)

./task-cli.php list
# Output: Lists all tasks

./task-cli.php list todo
# Output: Lists all tasks marked as todo
./task-cli.php list in-progress
# Output: Lists all tasks marked as in-progress
./task-cli.php list done
# Output: Lists all tasks marked as done
```

# Task Properties
Each task has the following properties:
 - **id:** A unique identifier for the task.
 - **description:** A short description of the task.
 - **status:** The status of the task (todo, in-progress, done).
 - **createdAt:** The date and time when the task was created.
 - **updatedAt:** The date and time when the task was last updated.

# Contributing
 Contributions are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request.

# License
This project is licensed under the MIT License. See the [LICENSE]() file for more details.
