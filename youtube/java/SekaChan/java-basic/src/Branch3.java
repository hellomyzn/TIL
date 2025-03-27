public class Branch3 {
    public static void main(String[] args) {
        int num = Integer.parseInt(args[0]);
        switch(num) {
            case 1:
                System.out.println("admission fee: 8000 yen");
                break;
            case 2:
                System.out.println("admission fee: 5000 yen");
                break;
            case 3:
                System.out.println("admission fee: 2000 yen");
                break;
            default:
                System.out.println("1: adult, 2: student, 3: baby");
        }
    }
}