package CN;
import java.util.*;
import java.lang.*;
import java.lang.*;
public class Hamming {

	public Hamming() {
		// TODO Auto-generated constructor stub
	}
	public static void main(String args[])
	{
		Scanner sc=new Scanner(System.in);
		int i,j,k=1,n,r=0,a[],c[],p,q,f=1;
		System.out.println("Enter size of dataword");
		n=sc.nextInt();
		a=new int[n+1];
		System.out.println("Enter dataword");
		for(i=1;i<=n;i++)
		 a[i]=sc.nextInt();
	    while(n>=Math.pow(2,r)-1)
	    	r++;
	    c=new int[n+r+1];
	    for(i=0;i<r;i++)
	    	c[(int)Math.pow(2,i)]=2;
	    for(i=1;i<c.length;i++)
	    {
	    	if(c[i]==2)
	    		continue;
	    	else
	    	{
	    		c[i]=a[k];
	    		k++;
	    	}
	    }
	    for(i=0;i<r;i++)
	    {
	    	p=0;
	    	q=0;
	    	f=1;
	    	k=(int)Math.pow(2,i);
	    	for(j=(int)Math.pow(2,i);j<c.length;j++)
	    	{
	    		if(q!=k&&f==1)
	    		{
	    			if(c[j]==2)
	    				q++;
	    			else if(c[j]==1)
	    			{
	    				p++;
	    				q++;
	    			}
	    			else
	    				q++;
	    		}
	    		else
	    		{
	    			q--;
	    			if(q==0)
	    				f=1;
	    			else
	    				f=0;
	    		}
	    	}
	    	if(p%2==0)
	    		c[k]=0;
	    	else
	    		c[k]=1;
	    }
	    System.out.println("The codeword is ");
	    for(i=1;i<c.length;i++)
	    	System.out.print(c[i]+" ");
	    System.out.println();
	    System.out.println("Enter bit no. where error is to be introduced");
	    int x=sc.nextInt();
	    if(c[x]==0)
	    	c[x]=1;
	    else
	    	c[x]=0;
	    System.out.println("The error word is ");
	    for(i=1;i<c.length;i++)
	    	System.out.print(c[i]+" ");
	    System.out.println();
	    int z[]=new int[r],y=0;
	    for(i=0;i<r;i++)
	    {
	    	p=0;
	    	q=0;
	    	f=1;
	    	k=(int)Math.pow(2,i);
	    	for(j=(int)Math.pow(2,i);j<c.length;j++)
	    	{
	    		if(q!=k&&f==1)
	    		{
	    			if(c[j]==2)
	    				q++;
	    			else if(c[j]==1)
	    			{
	    				p++;
	    				q++;
	    			}
	    			else
	    				q++;
	    		}
	    		else
	    		{
	    			q--;
	    			if(q==0)
	    				f=1;
	    			else
	    				f=0;
	    		}
	    	}
	    	if(p%2==0)
	    		z[r-y-1]=0;
	    	else
	    		z[r-y-1]=1;
	    	y++;
	    }
	    int e=0;
	    for(i=0;i<r;i++)
	       e=e+z[i]*(int)Math.pow(2,r-i-1);
        System.out.println("The error is at "+e+"th bit");
        if(c[e]==0)
        	c[e]=1;
        else
        	c[e]=0;
        System.out.println("The codeword after correction is ");
        for(i=1;i<c.length;i++)
        	System.out.print(c[i]+" ");
	}
}
