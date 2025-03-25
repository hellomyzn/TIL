public class Array {
    public static void main(String[] args) {
        int[] score = new int[3];
        score[0] = 80;
        score[1] = 100;
        score[2] = 75;

        String[] name = {"hoge", "fuga", "piyo"};

        System.out.println(name[0] + " san: " + score[0]);
        System.out.println(name[1] + " san: " + score[1]);
        System.out.println(name[2] + " san: " + score[2]);
        System.out.println(name.length);
    }
    
}
