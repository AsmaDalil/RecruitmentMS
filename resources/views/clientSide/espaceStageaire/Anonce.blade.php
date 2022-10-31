<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link
		rel="stylesheet"
		href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
		type="text/css"
		/>

		<title>Espace des Stages</title>
		<style></style>

	</head>
	<body class=" p-5 m-5" style="width: 80%;background-color: #80808017">
		<!-- Head : get information by ID "annance"-->
		<!--@foreach ($annoces as $an)-->
			<!-- get all Annonces infos from dataBase: -->
			<center style="background-color:white" class="m-5">
				<form class="d-flex flex-column flex-md-row border rounded mr-10 p-4" method="post" action="{{ route('anonce.indexStageaire') }}">
					@csrf

					<input hidden id="idAnnonce"  name="idAnnonce" value="{{$an['id']}}">
					<input hidden id="type"  name="type" value="{{$an['type']}}">
			        <img src="https://ats.talenteo.com/attachments/company_logo/logo_2416045_large.jpg" alt="'company-logo'" width="160" height="100"class="mr-auto mr-md-30 ml-md-0 mb-30 mb-md-0"/>
			        <div class="d-flex flex-column text-center text-md-left">
			        <h3> Anonce des Stages (Espace Stage) </h3>

					<div>
		                <span data-qa="company-name" class="mr-10">
		                    <i class="icon md-balance mr-5"></i>
		                    <strong> {{$an['siege']}} </strong>
		                </span>
		                <span data-qa="job-locations">
		                    <i class="icon md-pin mr-5"></i>
		                    <strong>
								{{$an['lieux']}}
							</strong>
							<span style="color : red"></span>
		                </span>
						<button type="submit" class="warning btn btn-primary">
							postuler

						</button>
		            </div>

			        </div>

			    </form>

			</center>
			

		<!-- end Head  -->
		@endforeach
		<!-- les annoces boucle  -->
		<div>

		</div>

	</body>
</html>