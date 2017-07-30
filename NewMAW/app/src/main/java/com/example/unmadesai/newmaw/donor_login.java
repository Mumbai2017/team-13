package com.example.unmadesai.newmaw;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class donor_login extends AppCompatActivity {
Button btnLogin,btnSignup;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_donor_login);

        btnLogin=(Button)findViewById(R.id.btnLogin);
        btnSignup=(Button)findViewById(R.id.btnSignup);

        btnLogin.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        Intent i = new Intent(donor_login.this,wish_activity.class);
        startActivity(i);
    }
});
        btnSignup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //Intent i = new Intent(donor_login.this,donor_reg.class);
                //startActivity(i);
                Toast.makeText(donor_login.this, "You're already signed in.", Toast.LENGTH_SHORT).show();
                Intent i = new Intent(donor_login.this,MainActivity.class);
                startActivity(i);
            }
        });
    }

}
