package com.example.sarvajna.datainsertion;

import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    EditText etName,etEmail;
    Button btn;
     String server_url="http://192.168.0.104/update_info.php";
    AlertDialog.Builder   builder;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etName= (EditText) findViewById(R.id.etName);
        etEmail= (EditText) findViewById(R.id.etEmail);
        btn= (Button) findViewById(R.id.btn);
        builder=new AlertDialog.Builder(MainActivity.this);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final String name,email;
                name = etName.getText().toString();
                email=etEmail.getText().toString();

                StringRequest stringRequest=new StringRequest(Request.Method.POST, server_url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        builder.setTitle("Server response");
                        builder.setMessage("Response :"+response);
                         builder.setPositiveButton("OK", new DialogInterface.OnClickListener() {
                             @Override
                             public void onClick(DialogInterface dialogInterface, int i) {

                                 etName.setText("");
                                 etEmail.setText("");
                             }
                          });
                        AlertDialog alertDialog=builder.create();
                        alertDialog.show();
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(MainActivity.this,error.toString(),Toast.LENGTH_LONG).show();
                        error.printStackTrace();
                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String,String> params =new HashMap<String, String>();
                        params.put("name",name);
                        params.put("email",email);
                        return params;
                    }
                };
                MySingleton.getInstance(MainActivity.this).addToRequestQueue(stringRequest);
            }
        });
    }
}
