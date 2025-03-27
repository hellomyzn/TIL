public class StuSample3 {
    public static void main(String[] args) {
        Student3 stu1 = new Student3("hoge");
        Student3 stu2 = new Student3("fuga", 20,20);

        stu1.setScore(10, 10);

        stu1.display();
        stu2.display();
    }
    
}
