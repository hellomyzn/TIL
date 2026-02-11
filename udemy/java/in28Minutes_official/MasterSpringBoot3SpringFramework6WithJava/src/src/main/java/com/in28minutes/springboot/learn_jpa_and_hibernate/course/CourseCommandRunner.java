package com.in28minutes.springboot.learn_jpa_and_hibernate.course;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

import com.in28minutes.springboot.learn_jpa_and_hibernate.course.jdbc.CourseJdbcRepository;
import com.in28minutes.springboot.learn_jpa_and_hibernate.course.jpa.CourseJpaRepository;
import com.in28minutes.springboot.learn_jpa_and_hibernate.course.springdatajpa.CourseSpringDataJpaRepository;;

@Component
public class CourseCommandRunner implements CommandLineRunner{

	// @Autowired
	// private CourseJdbcRepository repository;

	// @Autowired
	// private CourseJpaRepository repository;

	@Autowired
	private CourseSpringDataJpaRepository repository;

	@Override
	public void run(String... args) throws Exception {
		// repository.insert(new Course(1, "Learn AWS Now", "in28minutes"));
		// repository.insert(new Course(2, "Learn Azure Now", "in28minutes"));
		// repository.insert(new Course(3, "Learn GCP Now", "in28minutes"));

		repository.save(new Course(1, "Learn AWS Now", "in28minutes"));
		repository.save(new Course(2, "Learn Azure Now", "in28minutes"));
		repository.save(new Course(3, "Learn GCP Now", "in28minutes"));

		repository.deleteById(1l);
		
		System.out.println(repository.findById(2l));
		System.out.println(repository.findById(3l));
		System.out.println(repository.findAll());
		System.out.println(repository.count());

		System.out.println(repository.findByAuthor("in28minutes"));
		System.out.println(repository.findByName("Learn GCP Now"));
	}
	

}
