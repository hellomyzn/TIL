public class StuSample2 {
    public static void main(String[] args) {
        Student2 stu1 = new Student2();
        Student2 stu2 = new Student2();

        stu1.setData("hoge");
        stu1.setScore(10, 10);
        stu1.display();

        stu2.setData("fuga", 20, 20);
        stu2.display();
    }
    
}
