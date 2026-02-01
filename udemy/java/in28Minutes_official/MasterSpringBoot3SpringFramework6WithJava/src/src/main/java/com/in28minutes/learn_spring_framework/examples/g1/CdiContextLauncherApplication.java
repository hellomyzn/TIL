package com.in28minutes.learn_spring_framework.examples.g1;

import java.util.Arrays;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.stereotype.Component;


@Component
class BusinessService {
	private DataService DataService

	@Autowired
	public DataService getDataService() {
		return DataService;
	}

	public void setDataService(DataService dataService) {
		DataService = dataService;
	}
}

@Configuration
@ComponentScan
public class CdiContextLauncherApplication {

	public static void main(String[] args) {
		try (var context = new AnnotationConfigApplicationContext(CdiContextLauncherApplication.class);){
			Arrays.stream(context.getBeanDefinitionNames()).forEach(System.out::println);
		}
	}
}
