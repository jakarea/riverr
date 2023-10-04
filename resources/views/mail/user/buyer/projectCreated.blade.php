<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Created</title>

    <style>
        body{
            background: aliceblue
        }
    </style>
</head>
<body>

 
        <table cellpadding="0" cellspacing="0" border="0" style="background: aliceblue; min-width: 630px; width: 100%; padding-top: 1rem; font-family: Arial, Helvetica, sans-serif">
            <tr>
                <th style="background: #4f46e5; border-radius: 10px 10px 0 0; padding: 10px 2rem;"  style="width: 100%">
                    <h1 style="color: #fff">Project Created</h1> 
                </th>
            </tr>
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; padding: 1rem;">
                        <tr>
                            <td width="20%">
                                <h4>Project Name:</h4>
                            </td>
                            <td>
                                <h4><span>{{$project->title}}</span></h4>
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <h4>Budget Type:</h4>
                            </td>
                            <td>
                                <h4><span> {{$project->budget_type}}</span></h4>
                            </td> 
                        </tr> 
                        <tr>
                            <td style="padding-right: 1rem">
                                <h4>Project Budget:</h4>
                            </td>
                            <td>
                                <h4><span>{{$project->budget_min}}$ to {{$project->budget_max}}$</span></h4>
                            </td> 
                        </tr>
                        <tr>
                            <td style="text-align: center; padding: 2rem 0;" colspan="2">
                                <a href="{{ url('project/'.$project->pid.'/'.$project->slug) }}" style="padding: 10px 1rem;background: #4f46e5; border-radius: 6px; color: #fff; display: inline-block; text-decoration: none;">View Project</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center" colspan="2">
                                <h5>Created at: {{$project->created_at}}</h5>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border-radius: 0 0 10px 10px; background:#ddd; border-bottom: 25px solid #4f46e5; text-align: center;">
                    <p style="margin: 8px 0; font-size: 12px;">This is an automated email, please do not reply.</p>
                </td>
            </tr>
        </table>  
</body>
</html>