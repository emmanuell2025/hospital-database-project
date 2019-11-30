SELECT appointment.*
FROM appointment, doctor
WHERE appointment.drID = doctor.drID
AND doctor.drID = ' '