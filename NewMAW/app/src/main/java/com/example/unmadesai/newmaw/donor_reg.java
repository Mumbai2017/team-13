package com.example.unmadesai.newmaw;

import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class donor_reg extends AppCompatActivity {

    public Button btnRegister ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_donor_reg);
        btnRegister = (Button)findViewById(R.id.btnRegister);
        btnRegister.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                EditText nameET = (EditText)findViewById(R.id.etName);
                String name = nameET.getText().toString();
                EditText numberET = (EditText)findViewById(R.id.etPhone);
                String number = numberET.getText().toString();
                EditText email = (EditText)findViewById(R.id.etMail);

                String mail = email.getText().toString();
                EditText address2 = (EditText)findViewById(R.id.etPassword);
                String address = address2.getText().toString();
                EditText pass = (EditText)findViewById(R.id.etName);
                String password = pass.getText().toString();
              String jsonUrlString  = "http://localhost/team13/registerDonor.php?name="+nameET+"&contact="+number+"&email"+mail+"&address="+address+"&password="+password;

                insertJSON(jsonUrlString);
            }
        }
    }
    private void insertJSON(String url) {
        class GetJSON extends AsyncTask<String, Void, String> {
            protected String doInBackground(String... params) {
                String uri = params[0];
                BufferedReader bufferedReader = null;
                try {
                    URL url = new URL(uri);
                    HttpURLConnection con = (HttpURLConnection) url.openConnection();
                    StringBuilder sb = new StringBuilder();


                    return sb.toString().trim();

                } catch (Exception e) {
                    return null;
                }

            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                Toast.makeText(donor_reg.this, "You are now registered to MAW",Toast.LENGTH_SHORT).show();
            }

        }

        GetJSON gj = new GetJSON();
        gj.execute(url);
    }

}
