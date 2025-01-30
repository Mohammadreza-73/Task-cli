#!/usr/bin/env php
<?php

$fileName = 'tasks.json';

function loadTasks(): array
{
    global $fileName;
    if (! file_exists($fileName)) {
        return [];
    }

    return json_decode(file_get_contents($fileName), true);
}

function saveTask($task): void
{
    global $fileName;
    file_put_contents($fileName, json_encode($task, JSON_PRETTY_PRINT));
}

function addTask($task): void
{
    $tasks = loadTasks();
    $taskCount = count($tasks);

    $tasks[] = [
        'id' => uniqid(),
        'description' => $task,
        'status' => 'todo',
        'createdAt' => date('Y-m-d H:i:s'),
        'updatedAt' => date('Y-m-d H:i:s'),
    ];

    saveTask($tasks);

    echo "Task added successfully\n";
}

function updateTask(string $taskId, string $description): void
{
    $tasks = loadTasks();

    foreach ($tasks as &$task) {
        if ($task['id'] === $taskId) {
            $task['description'] = $description;
            $task['updatedAt'] = date('Y-m-d H:i:s');
            break;
        }
    }

    saveTask($tasks);

    echo "Task updated successfully\n";
}

function deleteTask(string $taskId): void
{
    $tasks = loadTasks();

    // foreach ($tasks as $key => $value) {
    //     if ($value['id'] === $taskId) {
    //         unset($tasks[$key]);
    //     }
    // }

    $tasks = array_filter($tasks, function($task) use ($taskId) {
        return $task['id'] !== $taskId;
    });

    saveTask($tasks);

    echo "Task {$taskId} delete successfully\n";
}

function markInProgress(string $taskId): void
{
    $tasks = loadTasks();

    foreach ($tasks as &$task) {
        if ($task['id'] === $taskId) {
            $task['status'] = 'in-progress';
            $task['updatedAt'] = date('Y-m-d H:i:s');
            break;
        }
    }

    saveTask($tasks);
    echo "Task ID: {$taskId} marked as in-progress successfully\n";
}

function markDone(string $taskId): void
{
    $tasks = loadTasks();

    foreach ($tasks as &$task) {
        if ($task['id'] === $taskId) {
            $task['status'] = 'done';
            $task['updatedAt'] = date('Y-m-d H:i:s');
            break;
        }
    }

    saveTask($tasks);
    echo "Task ID: {$taskId} marked as done successfully\n";
}

function listTasks(string $status = null): void
{
    $tasks = loadTasks();

    if (empty($tasks)) {
        echo "No Tasks found \n";
        exit(1);
    }

    if ($status === null) {
        echo json_encode($tasks, JSON_PRETTY_PRINT);
    }

    $tasks = array_filter($tasks, function ($task) use ($status) {
        return $task['status'] === $status;
    });

    echo json_encode($tasks, JSON_PRETTY_PRINT);
}

function flushFile(): void
{
    global $fileName;
    file_put_contents($fileName, '[]');

    echo "File flushed successfully\n";
}

function displayHelp() {
    echo "Task Manager CLI\n";
    echo "Usage: php task-cli.php [action] [arguments]\n\n";
    echo "Available commands:\n";
    echo "  add <description>       Add a new task\n";
    echo "  update <id> <description>  Update a task's description\n";
    echo "  delete <id>            Delete a task\n";
    echo "  mark-in-progress <id>  Mark a task as in progress\n";
    echo "  mark-done <id>         Mark a task as done\n";
    echo "  list [status]          List all tasks or filter by status (todo, in-progress, done)\n";
    echo "  help                   Display this help message\n";
}

// Handle command line arguments
if ($argc < 2) {
    echo "Usage: php task-cli.php [action] [arguments]\n\n";
    exit(1);
}

$action = $argv[1];

switch ($action) {
    case 'add':
        if ($argc < 3) {
            echo "Please provide a task to add.\n";
            exit(1);
        }

        $task = $argv[2];
        addTask($task);
        break;

    case 'update':
        if ($argc < 4) {
            echo "Please provide a task id to delete.\n";
            exit(1);
        }

        $taskId = $argv[2];
        $task = $argv[3];
        updateTask($taskId, $task);
        break;

    case 'delete':
        if ($argc < 3) {
            echo "Please provide a task id to delete.\n";
            exit(1);
        }

        $taskId = $argv[2];
        deleteTask($taskId);
        break;

    case 'mark-in-progress':
        if ($argc < 3) {
            echo "Please provide a task id to mark in-progress.\n";
            exit(1);
        }

        $taskId = $argv[2];
        markInProgress($taskId);
        break;

    case 'mark-done':
        if ($argc < 3) {
            echo "Please provide a task id to mark done.\n";
            exit(1);
        }

        $taskId = $argv[2];
        markDone($taskId);
        break;

    case 'list':
        $status = $argc >= 3 ? $argv[2] : null;
        listTasks($status);
        break;

    case 'flush':
        flushFile();
        break;

    case 'help':
        displayHelp();
        break;

    default:
        echo "Error: Unknown action.\n";
        displayHelp();
        break;
}