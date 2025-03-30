public class StuSample6 {
    public static void main(String[] args) {
        TandF taf = new TandF("rikujyo");
        Football fb = new Football("football");

        Student6 stu1 = new Student6("hoge", taf);
        stu1.display();
        stu1.practice();

        Student6 stu2 = new Student6("fuga", fb);
        stu2.display();
        stu2.practice();
        
    }
}
