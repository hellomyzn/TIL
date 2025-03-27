public class Branch1 {
    public static void main(String[] args) {
        int price = Integer.parseInt(args[0]);
        double rate = 0.10;
        int discount = 0;
        int amount;


        if (price >= 3000) {
            discount = 300;
        }

        amount = (int)((price - discount) * (1 + rate));
        System.err.println("discount: " + discount + " yen");
        System.err.println("amount: " + amount + " yen");
    }
    
}
