package com.in28minutes.learn_spring_framework;

import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.Primary;

record Person(String name, int age, Address address) {};
record Address(String firstLine, String city) {};

@Configuration
public class HelloWorldConfiguration {
	@Bean
	public String name() {
		return "Taro";
	}

	@Bean
	public int age() {
		return 15;
	}
	@Bean
	public Person person() {
		return new Person("Jiro", 20, new Address("main street", "chiba"));
	}

	@Bean
	public Person person2MethodCall() {
		return new Person(name(), age(), address());
	}

	@Bean
	public Person person3Parameters(String name, int age, Address address2) {
		return new Person(name, age, address2);
	}

	@Bean
	public Person person4Qualifier(String name, int age, @Qualifier("address4qualifier") Address address) {
		return new Person(name, age, address);
	}


	@Bean(name = "address2")
	public Address address() {
		return new Address("Ota", "Tokyo");
	}

	@Primary
	@Bean(name = "address3")
	public Address address2() {
		return new Address("Shibuya", "Tokyo");
	}

	@Bean(name = "address4")
	@Qualifier("address4qualifier")
	public Address address3() {
		return new Address("Nakano", "Tokyo");
	}
}
