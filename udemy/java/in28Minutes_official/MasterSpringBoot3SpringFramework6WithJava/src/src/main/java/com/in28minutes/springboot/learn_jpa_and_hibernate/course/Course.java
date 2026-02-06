package com.in28minutes.springboot.learn_jpa_and_hibernate.course;

public class Course {
	private long id;
	private String name;

	public long getId() {
		return id;
	}
	public Course() {
	}

	public Course(long id, String name, String author) {
		this.id = id;
		this.name = name;
		Author = author;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getName() {
		return name;
	}

	@Override
	public String toString() {
		return "Course [id=" + id + ", name=" + name + ", Author=" + Author + "]";
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getAuthor() {
		return Author;
	}

	public void setAuthor(String author) {
		Author = author;
	}

	private String Author;
}
