public class Student {
    String name;
    int engScore;
    int mathScore;

    void display() {
        System.err.println(name);
        System.err.println("eng: " + engScore + "math: " + mathScore);
    }

    void setScore(int eng, int math){
        engScore = eng;
        mathScore = math;
    }

    double getAvg(){
        double avg = (engScore + mathScore) / 2.0;
        return avg;
    }
    
}
