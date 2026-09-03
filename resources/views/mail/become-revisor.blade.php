<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Nuova richiesta revisore</title>
</head>

<body
    style="
        margin: 0;
        padding: 0;
        background-color: #111111;
        font-family: Arial, sans-serif;
        color: #F8F8F8;
    ">

    <div
        style="
            max-width: 600px;
            margin: 40px auto;
            background-color: #1A1A1A;
            border: 1px solid #D4AF37;
            border-radius: 16px;
            overflow: hidden;
        ">

        <div
            style="
                padding: 30px;
                text-align: center;
                border-bottom: 1px solid #333333;
            ">

            <p
                style="
                    margin: 0;
                    color: #D4AF37;
                    font-size: 13px;
                    font-weight: bold;
                    letter-spacing: 3px;
                ">

                PRESTO MARKETPLACE

            </p>

            <h2
                style="
                    margin: 15px 0 0;
                    color: #F8F8F8;
                ">

                Nuova richiesta revisore

            </h2>

        </div>

        <div style="padding: 30px;">

            <p style="color: #B8B8B8;">

                <strong style="color: #D4AF37;">
                    Nome:
                </strong>

                {{ $user->name }}

            </p>

            <p style="color: #B8B8B8;">

                <strong style="color: #D4AF37;">
                    Email:
                </strong>

                {{ $user->email }}

            </p>

            <div
                style="
                    margin: 25px 0;
                    padding: 20px;
                    background-color: #111111;
                    border-left: 3px solid #D4AF37;
                ">

                <strong style="color: #D4AF37;">

                    Messaggio del candidato:

                </strong>

                <p
                    style="
                        margin-bottom: 0;
                        color: #F8F8F8;
                        line-height: 1.6;
                    ">

                    {{ $messageText }}

                </p>

            </div>

            <div style="text-align: center; margin-top: 30px;">

                <a
                    href="{{ route('make.revisor', $user->email) }}"
                    style="
                        display: inline-block;
                        padding: 14px 28px;
                        background-color: #D4AF37;
                        color: #111111;
                        text-decoration: none;
                        font-weight: bold;
                        border-radius: 8px;
                    ">

                    Rendi revisore

                </a>

            </div>

        </div>

        <div
            style="
                padding: 20px;
                text-align: center;
                border-top: 1px solid #333333;
                color: #777777;
                font-size: 12px;
            ">

            © {{ date('Y') }} Presto

        </div>

    </div>

</body>

</html>