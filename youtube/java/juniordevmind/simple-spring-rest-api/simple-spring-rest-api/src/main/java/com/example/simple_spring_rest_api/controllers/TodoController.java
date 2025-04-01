package com.example.simple_spring_rest_api.controllers;

import java.net.URI;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.DeleteMapping;

import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;
import org.springframework.web.bind.annotation.RequestBody;

import com.example.simple_spring_rest_api.models.TodoItem;
import com.example.simple_spring_rest_api.services.TodoService;

import jakarta.validation.Valid;


@RestController
@RequestMapping(path = TodoController.BASE_URL)
public class TodoController {
    public static final String BASE_URL = "/api/v1/todos";

    @Autowired
    private TodoService _todoService;

    //get todos
    @GetMapping(path="")
    public ResponseEntity<List<TodoItem>> getTodoItems() {
        List<TodoItem> todoItems = _todoService.getTodoItems();
        return ResponseEntity.ok(todoItems);
    }
    
    //get todo
    @GetMapping(path="/{id}")
    public ResponseEntity<TodoItem> getTodoItem(@PathVariable int id) {
        TodoItem found = _todoService.getTodoItemById(id);
        return ResponseEntity.ok(found);
    }

    //create todo
    @PostMapping(path = "")
    public ResponseEntity<TodoItem> createTodoItem(@Valid @RequestBody TodoItem newTodoItem) {
        TodoItem savedTodoItem = _todoService.saveTodoItem(newTodoItem);
        URI location = ServletUriComponentsBuilder.fromCurrentRequest()
            .path("/{id}")
            .buildAndExpand(savedTodoItem.getId())
            .toUri();
        return ResponseEntity.created(location).body(savedTodoItem);
    }

    //update todo
    @PutMapping(path="/{id}")
    public ResponseEntity<?> updateTodoItem(@PathVariable int id,@RequestBody TodoItem todoItem) {
        _todoService.updateTodoItem(id, todoItem);
        return ResponseEntity.noContent().build();
    }

    //delete todo
    @DeleteMapping(path="/{id}")
    public ResponseEntity<?> deleteTodoItem(@PathVariable int id) {
        _todoService.deleteTodoItem(id);
        return ResponseEntity.noContent().build();
    }


}
