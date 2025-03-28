public class Student2 extends Person2 {
    private int stuNo;

    public void setStudNo(int s) {
        stuNo = s;
    }

    public void display() {
        System.out.println("name: " + getName());
        System.err.println("student no: " + stuNo);
    }
}
