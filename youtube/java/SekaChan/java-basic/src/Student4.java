public final class Student4 extends Person4 {
    private int stuNo;
    
    public Student4(String name, int stuNo) {
        super(name);
        this.stuNo = stuNo;
    }

    public void display(){
        super.display();
        System.err.println(this.stuNo);
    }
}
