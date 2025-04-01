package com.example.simple_spring_rest_api.errors;

import java.util.List;

import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.HttpStatusCode;
import org.springframework.http.ResponseEntity;
import org.springframework.lang.Nullable;
import org.springframework.validation.BindingResult;
import org.springframework.validation.FieldError;
import org.springframework.web.bind.MethodArgumentNotValidException;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.context.request.WebRequest;
import org.springframework.web.servlet.mvc.method.annotation.ResponseEntityExceptionHandler;

import jakarta.validation.constraints.Null;

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

	@Override
    @Nullable
	protected ResponseEntity<Object> handleMethodArgumentNotValid(MethodArgumentNotValidException ex,
			HttpHeaders headers, HttpStatusCode status, WebRequest request) {

        HttpStatus httpStatus = HttpStatus.BAD_REQUEST;

        BindingResult bindingResult = ex.getBindingResult();
        List<FieldError> fieldErrors =  bindingResult.getFieldErrors();
        String mes = fieldErrors.get(0).getDefaultMessage();

        ErrorResponse errorResponse = new ErrorResponse(mes, httpStatus);

        return this.handleExceptionInternal(ex, errorResponse, headers, httpStatus, request);
	}
}