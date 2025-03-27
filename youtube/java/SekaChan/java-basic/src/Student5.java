public class Student5 {
    private String name;
    private int score;

    public Student5(String n) {
        name = n;
    }

    public void setScore(int s) {
        if (0 <= s && s <= 100) {
            score = s;
        } else {
            System.err.println(name + "'s score is not acceptable");
            score = 0;
        }
    }

    void display() {
        System.out.println(name + "'s score is " + score);
    }
    
}
