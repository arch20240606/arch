<?php

namespace App\Http\Controllers;

use App\Models\FileChunk;
use App\Models\FileMetadata;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    // public function downloadFile($fileId)
    // {
    //     // Извлечение метаданных файла из таблицы files_metadata
    //     $fileMetadata = FileMetadata::find($fileId);
    
    //     // Если файл найден
    //     if ($fileMetadata) {
    //         // Извлечение всех chunks файла из таблицы file_chunks
    //         $fileChunks = FileChunk::where('files_id', $fileId)->orderBy('n')->get();
    
    //         // Если есть chunks файла
    //         if ($fileChunks->isNotEmpty()) {
    //             // Объединение данных всех chunks файла
    //             $decodedData = '';
    //             foreach ($fileChunks as $chunk) {
    //                 $decodedData .= base64_decode($chunk->data);
    //             }
    
    //             // Отправка файла клиенту в ответе
    //             $response = Response::make($decodedData);
    
    //             // Установка заголовков для скачивания файла
    //             $response->header('Content-Type', 'application/octet-stream');
    //             $response->header('Content-Disposition', 'attachment; filename="' . $fileMetadata->filename . '"');
    
    //             return $response;
    //         } else {
    //             return response()->json(['error' => 'File content not found'], 404);
    //         }
    //     } else {
    //         return response()->json(['error' => 'File metadata not found'], 404);
    //     }
    // }


    public function downloadFile($fileId)
{
    // Извлечение метаданных файла из таблицы files_metadata
    $fileMetadata = FileMetadata::find($fileId);

    // Если файл найден
    if ($fileMetadata) {
        // Извлечение первого чанка файла из таблицы file_chunks
        $fileChunk = FileChunk::where('files_id', $fileId)->orderBy('n')->first();

        // Если чанк файла найден
        if ($fileChunk) {
            // Декодируем данные чанка из Base64
            $decodedData = base64_decode($fileChunk->data);

            // Определяем тип файла на основе его расширения или других метаданных
            $contentType = 'application/octet-stream'; // по умолчанию

            // Устанавливаем заголовки ответа
            $headers = [
                'Content-Type' => $contentType,
                'Content-Disposition' => 'attachment; filename="' . $fileMetadata->filename . '"',
            ];

            // Создаем и возвращаем ответ с данными файла и установленными заголовками
            return Response::make($decodedData, 200, $headers);
        } else {
            return response()->json(['error' => 'File content not found'], 404);
        }
    } else {
        return response()->json(['error' => 'File metadata not found'], 404);
    }
}
    

}
