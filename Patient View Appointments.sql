SELECT apDate, apTime, apDesc, roomNum, drLName, procCost 
FROM appointment, doctor, proc
WHERE doctor.drID = appointment.drID 
AND appointment.pMRN = proc.pMRN
AND appointment.pMRN = ' ';
