package com.example.simple_spring_rest_api.controllers;

import java.util.List;
import java.util.ArrayList;

import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.RequestBody;


import com.example.simple_spring_rest_api.models.TodoItem;


@RestController
public class TodoController {

    private final List<TodoItem> _todoItems = new ArrayList<>() {{
        add(new TodoItem(1, "todo 1"));
        add(new TodoItem(2, "todo 2"));
        add(new TodoItem(3, "todo 3"));
    }};

    //get todos
    @RequestMapping(path="/todos", method=RequestMethod.GET)
    public List<TodoItem> getTodoItems() {
        return _todoItems;
    }
    
    //get todo
    @RequestMapping(path="/todo/{id}", method=RequestMethod.GET)
    public TodoItem getTodoItem(@PathVariable int id) {
        TodoItem found = getTodoItemById(id);
        if (found == null){
            // 404
        }
        return found;
    }

    //create todo
    @RequestMapping(path="/todos", method=RequestMethod.POST)
    public TodoItem createTodoItem(@RequestBody TodoItem todoItem) {
        todoItem.setId(1000);
        _todoItems.add(todoItem);

        return todoItem;
    }

    //update todo
    @RequestMapping(path="/todo/{id}", method=RequestMethod.PUT)
    public TodoItem updateTodoItem(@PathVariable int id, 
                                   @RequestBody TodoItem todoItem) {
        TodoItem found = getTodoItemById(id);
        if (found == null) {
            // return 404
        }

        _todoItems.remove(found);
        _todoItems.add(todoItem);

        return todoItem;
    }

    //delete todo
    @RequestMapping(path="/todo/{id}", method=RequestMethod.DELETE)
    public String deleteTodoItem(@PathVariable int id) {
        TodoItem found = getTodoItemById(id);
        if (found == null) {
            // return 404
        }
        _todoItems.remove(found);
        return "delete todo items";
    }

    private TodoItem getTodoItemById(int id) {
        return _todoItems.stream().filter(item -> item.getId() == id).findAny().orElse(null);

    }
}
