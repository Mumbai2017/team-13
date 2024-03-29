package com.example.unmadesai.newmaw;

import android.content.Context;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

import android.content.Context;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

/**
 * Created by unma desai on 30-Jul-17.
 */

public class MySingleton {

    private static MySingleton myInstance;
    private RequestQueue requestQueue;
    private  static Context mc;

    private MySingleton(Context context)
    {
        mc=context;
        requestQueue=getRequestQueue();
    }
    public RequestQueue getRequestQueue()
    {

        if (requestQueue==null)
        {
            requestQueue= Volley.newRequestQueue(mc.getApplicationContext());
        }
        return requestQueue;
    }

    public static synchronized MySingleton  getInstance(Context context)
    {
        if(myInstance==null)
        {
            myInstance=new MySingleton(context);

        }
        return myInstance;
    }
    public <T> void addToRequestQueue(Request<T> request )
    {
        requestQueue.add(request);
    }
}
