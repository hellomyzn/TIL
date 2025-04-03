public class HeightComparator : IComparator {
    public int compare(HumanStrategy h1,HumanStrategy h2){
        if (h1.height > h2.height) {
            return 1;
        } else if (h1.height == h2.height) {
            return 0;
        } else {
            return -1;
        }
    }
}