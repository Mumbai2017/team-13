import java.io.*;
import java.util.*;


public class ArrayReverse {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Deque q=new LinkedList();
        
        int n=sc.nextInt();
        
        for(int i=0;i<n;i++)
            q.add(sc.nextBigInteger());
        
        for(int i=0;i<n;i++)
            System.out.print(q.removeLast()+" ");
    }
}
