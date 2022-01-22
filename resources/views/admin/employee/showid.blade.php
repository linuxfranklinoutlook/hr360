    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Identy Card Details of {{ $employee->getFullName() }} 
        </h3>
    </div>
    <table>
        
        <tr>
            <th></th>
            <th></th>
            
        </tr>
        <tr>
            <td><code> <strong> Name</td>
            <td><code>{{ $employee->getFullName() }}</td>
        </tr>
        <tr>
            <td><code><strong>Email Address</td>
            <td><code>{{ $employee->personal_email }}</td>
        </tr>
         <tr>
            <td> <code><strong>Phone Number</td>
            <td> <code> {{ $employee->phone_number }}</td>
        </tr>
        <tr>
            <td> <code><strong> Date of Birth</td>
            <td> <code> {{ $employee->date_of_birth }}</td>
        </tr>
        <tr>
            <td>   <code><strong>Emergency Contact Name</td>
            <td> <code> {{ $employee->emergency_contact_name }}</td>
        </tr>
        <tr>
            <td> <code> <strong> Emergency Contact Number</td>
            <td> <code> {{ $employee->emergency_contact_number }}</td>
        </tr>
        <tr>
            <td> <code> <strong> Relationship</td>
            <td> <code> {{ $employee->emergency_relationship }}</td>
        </tr>
        <tr>
            <td> <code> <strong> Blood Group</td>
            <td> <code> {{ $employee->blood_group }}</td>
        </tr>
        <tr>
            <td>    <code><strong>Present Address</code></td>
            <td>  <code>{{ json_decode($employee->current_address)->addr_line_1 }}</code>
            <code>{{ json_decode($employee->current_address)->addr_line_2 }}</code>
            <code>{{ json_decode($employee->current_address)->city }}</code>
            <code>{{ json_decode($employee->current_address)->state }}</code>
            <code>{{ json_decode($employee->current_address)->pincode }}</code></td>
        </tr>
    </table>

    

   