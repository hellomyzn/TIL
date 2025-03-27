public class StuSample {
    public static void main(String[] args) {
        Student stu1 = new Student();

        stu1.name = "hoge";
        stu1.setScore(10, 20);

        stu1.display();
        System.err.println("avg: "+ stu1.getAvg());
        
    }
    
}
