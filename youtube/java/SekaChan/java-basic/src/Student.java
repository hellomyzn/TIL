public class Student extends Person{
    private int stuNo;

    public void setStudNo(int s) {
        stuNo = s;
    }

    public void displayStuNo() {
        System.err.println("student no: " + stuNo);
    }

    
}
