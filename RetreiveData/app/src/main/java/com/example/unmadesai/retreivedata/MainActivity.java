package com.example.unmadesai.retreivedata;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.math.BigInteger;

public class MainActivity extends AppCompatActivity {

    TextView textView1, textView2, textView3;
    Button b1;
    String json_url = "http://10.49.166.199/user_info.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        textView1 = (TextView) findViewById(R.id.textView1);

        textView2 = (TextView) findViewById(R.id.textView2);

        textView3 = (TextView) findViewById(R.id.textView3);
        b1 = (Button) findViewById(R.id.button);
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                JsonObjectRequest jsonObjectRequest=new JsonObjectRequest(Request.Method.POST, json_url, null, new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            textView1.setText(response.getString("name"));
                            textView2.setText(response.getString("email"));
                            textView3.setText(response.getString("mobile"));
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                   Toast.makeText(getApplicationContext(),"Error "+error.toString(),Toast.LENGTH_LONG).show();
                    }
                });
                MySingleton.getInstance(MainActivity.this).addToRequestQueue(jsonObjectRequest);
            }
        });


    }
    }

