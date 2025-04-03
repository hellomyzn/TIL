public class AgeComparator :  IComparator{
    public int compare(HumanStrategy h1 , HumanStrategy h2){
        if (h1.age > h2.age) {
            return 1;
        } else if (h1.age == h2.age) {
            return 0;
        } else {
            return -1;
        }
    }
}