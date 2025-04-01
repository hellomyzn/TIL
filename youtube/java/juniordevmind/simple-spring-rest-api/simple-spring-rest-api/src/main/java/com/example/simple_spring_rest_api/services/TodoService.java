package com.example.simple_spring_rest_api.services;

import java.util.List;

import com.example.simple_spring_rest_api.models.TodoItem;

public interface TodoService {
    public TodoItem saveTodoItem(TodoItem todoItem);

    public List<TodoItem> getTodoItems();

    public TodoItem getTodoItemById(int id);

    public TodoItem updateTodoItem(int id, TodoItem todoItem);

    public void deleteTodoItem(int id);
}
