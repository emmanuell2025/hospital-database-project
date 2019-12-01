SELECT apID, appointment.DeptID, apDesc, procID, roomNum, apDate, apTime, pMRN
FROM appointment, doctor
WHERE appointment.drID = doctor.drID
AND doctor.drID = ' ';

