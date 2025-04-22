package com.example.spring_introduction;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;


@SpringBootApplication
@RestController
public class SpringIntroductionApplication {

	@GetMapping("/")
	public String hello() {
		return "Hello World";
	}
	


	public static void main(String[] args) {
		SpringApplication.run(SpringIntroductionApplication.class, args);
	}

}
