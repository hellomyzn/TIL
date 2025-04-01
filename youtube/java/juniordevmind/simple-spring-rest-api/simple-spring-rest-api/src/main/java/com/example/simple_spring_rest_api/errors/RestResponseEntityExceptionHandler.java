package com.example.simple_spring_rest_api.errors;

import org.springframework.http.HttpStatus;
import org.springframework.http.HttpHeaders;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.context.request.WebRequest;
import org.springframework.web.servlet.mvc.method.annotation.ResponseEntityExceptionHandler;

@ControllerAdvice
public class RestResponseEntityExceptionHandler extends ResponseEntityExceptionHandler{
    
    @ExceptionHandler(value = {NotFoundException.class, BadRequestException.class})
    protected ResponseEntity<Object> handleNotFoundException(HttpException ex, WebRequest request) {
        String mes = ex.getMessage();
        HttpHeaders headers = new HttpHeaders();
        HttpStatus httpStatus = ex.getHttpStatus();
        ErrorResponse errorResponse = new ErrorResponse(mes, httpStatus);

        return this.handleExceptionInternal(ex, errorResponse, headers, httpStatus, request);
    }
}