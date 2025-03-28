public class StuSample5 {
    public static void main(String[] args) {
        Student5 stu1 = new Student5("hoge", 1 );
        Person5 psn = stu1;
        psn.display();

        if (psn instanceof Student5) {
            Student5 stu2 = (Student5) psn;
            stu2.chgStuNo(1001);
            stu2.display();
        }
    }
    
}
