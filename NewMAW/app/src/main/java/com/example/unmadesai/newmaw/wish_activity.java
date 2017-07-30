package com.example.unmadesai.newmaw;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.SearchView;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

public class wish_activity extends AppCompatActivity {
    TextView textView1, textView2, textView3;
    Button b1;
    String json_url = "http://10.49.166.199/user_info.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_wish_activity);
        textView1 = (TextView) findViewById(R.id.tvCity1);

        textView2 = (TextView) findViewById(R.id.tvCity2);

        textView3 = (TextView) findViewById(R.id.tvCity3);


        JsonObjectRequest jsonObjectRequest=new JsonObjectRequest(Request.Method.POST, json_url, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                try {
                    textView1.setText(response.getString("wish_name"));
                    textView2.setText(response.getString("wish_name"));
                    textView3.setText(response.getString("wish_name"));
                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
               // Toast.makeText(getApplicationContext(),"Error "+error.toString(),Toast.LENGTH_LONG).show();
            }
        });
        MySingleton.getInstance(wish_activity.this).addToRequestQueue(jsonObjectRequest);


    }
}
