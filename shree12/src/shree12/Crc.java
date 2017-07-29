package CN;
import java.util.*;
public class Crc {

	public Crc() {
		// TODO Auto-generated constructor stub
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner sc=new Scanner(System.in);
		int i,j,k,g,d,gen[],data[];
		System.out.println("Enter the size of the generator");
		g=sc.nextInt();
		gen=new int[g];
		System.out.println("Enter generator");
		for(i=0;i<g;i++)
			gen[i]=sc.nextInt();
		System.out.println("Enter the size of the dataword");
		d=sc.nextInt();
		data=new int[d+g-1];
		System.out.println("Enter dataword");
		for(i=0;i<d;i++)
			data[i]=sc.nextInt();
		
        int rem[]=new int[g-1];
        int div[]=new int[g];
        for(i=0;i<g;i++)
        	div[i]=data[i];
  
        while(i<=data.length)
        {
        	if(div[0]==1)
        	{
        		for(k=1;k<g;k++)
        		{
        			rem[k-1]=div[k]^gen[k];
        		}
        	    for(k=0;k<g-1;k++)
        	    {
        	    	div[k]=rem[k];
        	    }
        	    if(i<data.length)
        	    {
        	    	div[k]=data[i];
            	    i++;
        	    }
        	    else
        	    	break;
          	}
        	else
        	{
        		for(k=1;k<g;k++)
        		{
        			rem[k-1]=div[k]^0;
        		}
        	    for(k=0;k<g-1;k++)
        	    {
        	    	div[k]=rem[k];
        	    }
        		if(i<data.length)
        	    {
        	    	div[k]=data[i];
            	    i++;
        	    }
        		else
        			break;
        	}
        }
        System.out.print("Remainder is =");
        for(j=0;j<g-1;j++)
        	System.out.print(rem[j]);
        System.out.println("");
        System.out.println();
        for(k=0,i=d;k<g-1;k++,i++)
        {
        	data[i]=rem[k];
        }
        System.out.print("The codeword is = ");
        for(i=0;i<data.length;i++)
        	System.out.print(data[i]);
	}

}
