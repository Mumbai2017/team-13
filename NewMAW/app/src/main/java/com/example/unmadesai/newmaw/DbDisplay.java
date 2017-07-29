package com.example.unmadesai.newmaw;

import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.io.BufferedReader;
import java.net.HttpURLConnection;

public class DbDisplay extends AppCompatActivity {

    public TextView textView2;
    public TextView textView3;
    public Button btn;
    public static final String jsonUrlString  = "http://localhost/team13/getsampledata.php";



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_db_display);

        textView2 = (TextView)findViewById(R.id.textView2);
        textView3 = (TextView)findViewById(R.id.textView3);
        btn = (Button) findViewById(R.id.btn);

        btn.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                getJSON(jsonUrlString);
            }
        });

    }

    private void getJSON(String jsonUrlString) {
        class GetJSON extends AsyncTask<String, Void, String> {
            protected String doInBackground(String... params) {
                String uri = params[0];
                BufferedReader bufferedReader = null;
                try{
                    //HttpURLConnection
                }catch(Exception e){}
                return uri;
            }
        }


    }




}
