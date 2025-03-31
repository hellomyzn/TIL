package com.example.simple_spring_rest_api.controllers;

import java.util.List;
import java.util.concurrent.atomic.AtomicInteger;
import java.net.URI;
import java.util.ArrayList;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.server.ResponseStatusException;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;
import org.springframework.web.bind.annotation.RequestBody;

import com.example.simple_spring_rest_api.models.TodoItem;


@RestController
@RequestMapping(path = TodoController.BASE_URL)
public class TodoController {
    public static final String BASE_URL = "/api/v1/todos";
    private final AtomicInteger _counter = new AtomicInteger();

    private final List<TodoItem> _todoItems = new ArrayList<>() {{
        add(new TodoItem(_counter.incrementAndGet(), "todo 1"));
        add(new TodoItem(_counter.incrementAndGet(), "todo 2"));
        add(new TodoItem(_counter.incrementAndGet(), "todo 3"));
    }};

    //get todos
    @RequestMapping(path="", method=RequestMethod.GET)
    public List<TodoItem> getTodoItems() {
        return _todoItems;
    }
    
    //get todo
    @RequestMapping(path="/{id}", method=RequestMethod.GET)
    public TodoItem getTodoItem(@PathVariable int id) {
        TodoItem found = getTodoItemById(id);
        if (found == null){
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Not Found");
            // 404
        }
        return found;
    }

    //create todo
    @RequestMapping(path="", method=RequestMethod.POST)
    public ResponseEntity<TodoItem> createTodoItem(@RequestBody TodoItem todoItem) {
        todoItem.setId(_counter.incrementAndGet());
        _todoItems.add(todoItem);
        URI location = ServletUriComponentsBuilder.fromCurrentRequest().path("/{id}").buildAndExpand(todoItem.getId()).toUri();
        return ResponseEntity.created(location).body(todoItem);
    }

    //update todo
    @RequestMapping(path="/{id}", method=RequestMethod.PUT)
    public ResponseEntity<?> updateTodoItem(@PathVariable int id, 
                                   @RequestBody TodoItem todoItem) {
        TodoItem found = getTodoItemById(id);
        if (found == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Not Found");
        }

        _todoItems.remove(found);
        _todoItems.add(todoItem);

        return ResponseEntity.noContent().build();
    }

    //delete todo
    @RequestMapping(path="/{id}", method=RequestMethod.DELETE)
    public ResponseEntity<?> deleteTodoItem(@PathVariable int id) {
        TodoItem found = getTodoItemById(id);
        if (found == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Not Found");
        }
        _todoItems.remove(found);
        return ResponseEntity.noContent().build();
    }

    private TodoItem getTodoItemById(int id) {
        return _todoItems.stream().filter(item -> item.getId() == id).findAny().orElse(null);

    }
}
