# Task Manager CLI

A simple command-line task manager built in PHP. This application allows you to add, update, delete, and manage tasks with statuses like `todo`, `in-progress`, and `done`. Tasks are stored in a JSON file for persistence.

## Features

- **Add Tasks**: Add new tasks with a description.
- **Update Tasks**: Update the description of an existing task.
- **Delete Tasks**: Remove tasks by their ID.
- **Mark Tasks**: Mark tasks as `in-progress` or `done`.
- **List Tasks**: View all tasks or filter by status (`todo`, `in-progress`, `done`).
- **Help Command**: Get a list of available commands and their usage.

## Installation

### Download the Script:
Download the task-cli.php file to your local machine.

### Make the Script Executable (Optional):
On Unix-based systems (Linux/macOS), you can make the script executable:
``` bash
chmod +x task-cli.php
```

## Usage
Run the script from the command line using the following syntax:
``` php
php task-cli.php [action] [arguments]
```
or execute file
``` bash
./task-cli.php [action] [arguments]
```

## Error Handling
The script handles errors gracefully and provides helpful error messages. For example:
If a required argument is missing, it will display an error message.
If a task ID does not exist, it will notify the user.

## License
This project is open-source and available under the MIT License.

## Contributing
Contributions are welcome! If you find a bug or have a feature request, please open an issue or submit a pull request.