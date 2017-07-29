package com.example.unmadesai.newmaw;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button btnDonor,btnVolunteer;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Intent i=new Intent(MainActivity.this,DbDisplay.class);
        startActivity(i);
        btnDonor= (Button) findViewById(R.id.btnDonor);
        btnVolunteer= (Button) findViewById(R.id.btnVolunteer);

        btnDonor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i=new Intent(MainActivity.this,donor_login.class);
                startActivity(i);
            }
        });

        btnVolunteer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
         Intent i1 = new Intent(MainActivity.this,TrackerActivity.class);
                startActivity(i1);

            }
        });
}
}
