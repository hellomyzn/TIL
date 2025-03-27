public class Student2 {
    String name;
    int engScore;
    int mathScore;

    void setData(String n) {
        name = n;
    }

    void setData(String n, int e, int m) {
        name = n;
        engScore = e;
        mathScore = m;

    }
    void display() {
        System.err.println(name);
        System.err.println("eng: " + engScore + "math: " + mathScore);
    }

    void setScore(int eng, int math){
        engScore = eng;
        mathScore = math;
    }

    
}
