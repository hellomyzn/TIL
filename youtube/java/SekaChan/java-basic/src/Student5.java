public class Student5 extends Person5 {
    private int stuNo;

    public Student5(String name, int stuNo) {
        super(name);
        this.stuNo = stuNo;
    }

    void display() {
        super.display();
        System.err.println(this.stuNo);
    }

    public void chgStuNo(int stuNo){
        this.stuNo = stuNo;
    }
    
}
